<?php

// INTERFACES
interface HttpFactory
{
    public function createCurlClient(): CurlClient;
    public function createWrapperClient(): WrapperClient;
}


interface CurlClient
{
    public function send(array $data): void;
}


interface WrapperClient
{
    public function send(array $data): void;
}

//  CLIENTS
class V1CurlClient implements CurlClient
{
    public function send(array $data): void
    {
        echo "send data version 1 protocol over curl";
    }
}


class V2CurlClient implements CurlClient
{
    public function send(array $data): void
    {
        echo "send data version 2 protocol over curl";
    }
}


class V1WrapperClient implements WrapperClient
{
    public function send(array $data): void
    {
        echo "send data version 1 protocol over wrapper";
    }
}


class V2WrapperClient implements WrapperClient
{
    public function send(array $data): void
    {
        echo "send data version 2 protocol over wrapper";
    }
}


// FACTORIES
class V1HttpFactory implements HttpFactory
{

    public function createCurlClient(): CurlClient
    {
        return new V1CurlClient();
    }

    public function createWrapperClient(): WrapperClient
    {
        return new V1WrapperClient();
    }
}


class V2HttpFactory implements HttpFactory
{

    public function createCurlClient(): CurlClient
    {
        return new V2CurlClient();
    }

    public function createWrapperClient(): WrapperClient
    {
        return new V2WrapperClient();
    }
}


// USAGE
$sendFactory = new V2HttpFactory();
$sendFactory->createCurlClient()->send(['status' => 1]);

$sendFactory = new V1HttpFactory();
$sendFactory->createWrapperClient()->send(['status' => 1]);


