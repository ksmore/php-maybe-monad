<?php

/*
 * Copyright (c) 2014 Marcelo Camargo <marcelocamargo@linuxmail.org>
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation files
 * (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge,
 * publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial of portions the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace HaskellCamargo\Maybe;

/**
 * `Just` is a constructor of the `Maybe` type/monad. It must carry a value.
 */
class Just implements MaybeInterface, JustInterface
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function bind(callable $fn)
    {
        return Maybe($fn($this->value));
    }

    /**
     * {@inheritdoc}
     */
    public function fromJust()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function fromMaybe($_)
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isJust()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isNothing()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function maybe($_, callable $fn)
    {
        return $fn($this->value);
    }

    /**
     * {@inheritdoc}
     */
    public function toList()
    {
        return [$this->value];
    }
}
