<?php

namespace config;

class MysqlConfig
{
    public static function getHost(): string
    {
        return getenv('DB_HOST', true) ?: 'MySQL-8.2';
    }

    public static function getUsername(): string
    {
        return getenv('DB_USERNAME') ?: 'root';
    }

    public static function getPassword(): string
    {
        return getenv('DB_PASSWORD') ?: '';
    }

    public static function getDataBase(): string
    {
        return getenv('DB_DATABASE') ?: 'mini_blog';
    }
}