<?php


/**
 * Pipe-able workflow.
 */
class Pipeline
{
    /** @var array|Generator */
    private $flow;

    /**
     * @param array|Generator $flow
     */
    public function __construct($flow)
    {
        $this->flow = $flow;
    }

    /**
     * Zwraca obiekt klasy Pipeline
     * @param callable $work
     * @return Pipeline
     */
    public function pipe(callable $work)
    {
        $next = function () use ($work) {
            foreach ($this->flow as $item) {
                yield $work($item);
            }
        };

        return new self($next());
    }

    /**
     * @return Generator
     */
    public function tap()
    {
        foreach ($this->flow as $item) {
            yield $item;
        }
    }
}