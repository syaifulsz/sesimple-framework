<?php

namespace App\Components;

use App\Components\TextHelper;

class Cache
{
    private function filePath($key)
    {
        return CACHE_DIR . '/' . TextHelper::slugify($key) . '.cache';
    }

    public function set($cacheKey, $cacheData, $expire = false)
    {
        $cacheFile = $this->filePath($cacheKey);
        if ($cacheData) {
            return file_put_contents($cacheFile, json_encode([
                'expire' => $expire,
                'data' => base64_encode(gzcompress(serialize($cacheData)))
            ])) ? true : false;
        }
    }

    public function get($cacheKey)
    {
        $cacheFile = $this->filePath($cacheKey);

        if (file_exists($cacheFile)) {

            $cache = file_get_contents($cacheFile);
            $cache = json_decode($cache, true);

            if (isset($cache['expire']) && $cache['expire'] !== false) {
                if (filectime($cacheFile) + $cache['expire'] < time()) {
                    return null;
                }
            }

            if (!empty($cache['data'])) {
                return unserialize(gzuncompress(base64_decode($cache['data'])));  // unserialize(gzuncompress($cache['data']));
            }
        }

        return null;
    }

    public function remove($cacheKey)
    {
        $cacheFile = $this->filePath($cacheKey);

        if (file_exists($cacheFile)) {
            return unlink($cacheFile) ? true : false;
        }

        return true;
    }

    public function removeAll()
    {
        $count = 0;
        return array_map('unlink', glob(CACHE_DIR . '/*.cache'));
    }
}
