<?php

namespace RMS\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Psr\Log\LoggerInterface;

/**
 * Application logging aspect
 */
class LoggingAspect implements Aspect
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Writes a log info before method execution
     *
     * @param MethodInvocation $invocation
     * @Before("execution(public **->*(*))")
     */
    public function beforeMethod(MethodInvocation $invocation)
    {
        $this->logger->info($invocation, $invocation->getArguments());
    }
}