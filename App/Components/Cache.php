<?php

namespace App\Components;

use App\Components\TextHelper;

class Cache
{
    private function filePath($key, $subDir = null)
    {
        return CACHE_DIR . '/' . ($subDir ? "{$subDir}/" : '') . "{$key}.cache";
    }

    public function set($cacheKey, $cacheData, $expire = false, $prefix = null)
    {
        $cacheFile = $this->filePath($cacheKey, $prefix);
        if ($cacheData) {

            $pathInfo = pathinfo($cacheFile);

            if (!file_exists($pathInfo['dirname'])) {
                mkdir($pathInfo['dirname'], 0777, true);
            }

            return file_put_contents($cacheFile, json_encode([
                'expire' => $expire,
                'data' => base64_encode(gzcompress(serialize($cacheData)))   // gzcompress(serialize($cacheData))
            ])) ? true : false;
        }
    }

    public function get($cacheKey, $prefix = null)
    {
        $cacheFile = $this->filePath($cacheKey, $prefix);

        if (file_exists($cacheFile)) {

            $cache = file_get_contents($cacheFile);
            $cache = json_decode($cache, true);

            if (isset($cache['expire']) && $cache['expire'] !== false) {
                if (filectime($cacheFile) + $cache['expire'] < time()) {
                    return null;
                }
            }

            if (!empty($cache['data'])) {
                return unserialize(gzuncompress(base64_decode($cache['data'])));
            }
        }

        return null;
    }

    public function remove($cacheKey, $prefix = null)
    {
        $cacheFile = $this->filePath($cacheKey, $prefix);

        if (file_exists($cacheFile)) {
            return unlink($cacheFile) ? true : false;
        }

        return true;
    }

    public function removePrefix($prefix)
    {
        $cacheDir = CACHE_DIR . "/{$prefix}";

        if (file_exists($cacheDir)) {
            return rmdir($cacheDir) ? true : false;
        }

        return true;
    }

    public function removeAll()
    {
        $removes = [];
        foreach (glob(CACHE_DIR . '/*') as $dir) {

            if (is_dir($dir)) {
                system('rm -rf ' . escapeshellarg($dir), $retval);
                $removes[$dir] = ($retval === 0);
            } else {
                $removes[$dir] = unlink($dir);
            }
        }

        return $removes;
    }

    public function createKey($keys, $md5 = true)
    {
        if (is_array($keys)) {
            $keys = http_build_query($keys);
        }

        if (!$md5) {
            return TextHelper::slugify(urldecode($keys), '-');
        }

        return md5($keys);
    }
}
