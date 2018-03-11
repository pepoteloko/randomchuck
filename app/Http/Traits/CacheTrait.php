<?php

namespace App\Http\Traits;

use App;
use Cache;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Repository;

/**
 * Trait CacheTrait
 */
trait CacheTrait
{
    /**
     * @var \Illuminate\Cache\FileStore Cache query
     */
    var $cache;

    /**
     * @var bool
     */
    var $useCache = true;

    /**
     * Determine the Cache Name used for this Controller
     *
     * @param array $properties
     * @param string $function
     * @return string
     */
    protected function determineCacheName(array $properties, $function = 'controller')
    {
        if (!$this->cache instanceof Repository) {
            $this->cache = Cache::getStore();
        }

        return App::environment() . ".$function." . md5(serialize($properties));
    }

    /**
     * Save a value in cache.
     *
     * Save a value in cache, and decides the time dynamically.
     * By default the time is 24 hours. If the second tag (pos. 1) is past year the time is a month.
     *
     * @param string $name
     * @param mixed $value
     */
    protected function storeValueInCache($name, $value)
    {
        if (!$this->cache instanceof Repository) {
            $this->cache = Cache::getStore();
        }

        $time = 60;

        $this->cache->put($name, $value, $time);
    }

    /**
     * Recupera un valor de la cache, si no existe devuelve null
     *
     * @param $cacheName
     * @return mixed|null
     */
    public function getCacheContent($cacheName) {
        $data = null;

        if ($this->useCache) {
            $data = $this->cache->get($cacheName);
        }

        return $data;
    }
}