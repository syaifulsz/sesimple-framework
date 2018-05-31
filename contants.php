<?php

const ROOT_DIR          = __DIR__;
const APP_DIR           = __DIR__ . '/App';
const VIEW_DIR          = __DIR__ . '/App/Views';
const CACHE_DIR         = __DIR__ . '/App/Cache';
const CONFIG_DIR        = __DIR__ . '/App/Configs';

// time caching helper
const MINUTE_IN_SECONDS  = 60;
const HOUR_IN_SECONDS    = 60   * MINUTE_IN_SECONDS;
const DAY_IN_SECONDS     = 24   * HOUR_IN_SECONDS;
const WEEK_IN_SECONDS    = 7    * DAY_IN_SECONDS;
const MONTH_IN_SECONDS   = 30   * DAY_IN_SECONDS;
const YEAR_IN_SECONDS    = 365  * DAY_IN_SECONDS;
