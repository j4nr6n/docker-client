<?php

namespace j4nr6n\DockerClient\Exception;

class DockerException extends \Exception implements DockerExceptionInterface
{
    public function __construct(string $message = "", ?\Throwable $previous = null, int $code = 0)
    {
        parent::__construct($message, $code, $previous);
    }
}
