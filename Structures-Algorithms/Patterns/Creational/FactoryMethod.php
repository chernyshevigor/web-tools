<?php

interface Requester
{
    public function run(string $message): void;
}

class HttpRequester implements Requester
{
    public function run(string $message): void
    {
        // send via curl
        echo $message;
    }
}

class FileRequester implements Requester
{
    public function __construct(private string $filePath)
    {

    }

    public function run(string $message): void
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

interface RequesterFactory
{
    public function createRequester(): Requester;
}

class HttpRequesterFactory implements RequesterFactory
{
    public function createRequester(): Requester
    {
        return new HttpRequester();
    }
}

class FileRequesterFactory implements RequesterFactory
{
    public function __construct(private string $filePath)
    {

    }

    public function createRequester(): Requester
    {
        return new FileRequester($this->filePath);
    }
}

clientCode((new HttpRequesterFactory())->createRequester());
function clientCode(Requester $creator): void
{
    $creator->run("Hello world!");
}
