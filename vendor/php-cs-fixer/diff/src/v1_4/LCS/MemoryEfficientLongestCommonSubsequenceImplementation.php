<?php
/*
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 */

namespace PhpCsFixer\Diff\v1_4\LCS;

/**
 * Memory-efficient implementation of longest common subsequence calculation.
 */
class MemoryEfficientImplementation implements LongestCommonSubsequence
{
    /**
     * Calculates the longest common subsequence of two arrays.
     *
     * @param array $from
     * @param array $to
     *
     * @return array
     */
    public function calculate(array $from, array $to)
    {
        $cFrom = \count($from);
        $cTo   = \count($to);

        if ($cFrom === 0) {
            return array();
        }

        if ($cFrom === 1) {
            if (\in_array($from[0], $to, true)) {
                return array($from[0]);
            }

            return array();
        }

        $i         = (int) ($cFrom / 2);
        $fromStart = \array_slice($from, 0, $i);
        $fromEnd   = \array_slice($from, $i);
        $llB       = $this->length($fromStart, $to);
        $llE       = $this->length(\array_reverse($fromEnd), \array_reverse($to));
        $jMax      = 0;
        $max       = 0;

        for ($j = 0; $j <= $cTo; $j++) {
            $m = $llB[$j] + $llE[$cTo - $j];

            if ($m >= $max) {
                $max  = $m;
                $jMax = $j;
            }
        }

        $toStart = \array_slice($to, 0, $jMax);
        $toEnd   = \array_slice($to, $jMax);

        return \array_merge(
            $this->calculate($fromStart, $toStart),
            $this->calculate($fromEnd, $toEnd)
        );
    }

    /**
     * @param array $from
     * @param array $to
     *
     * @return array
     */
    private function length(array $from, array $to)
    {
        $current = \array_fill(0, \count($to) + 1, 0);
        $cFrom   = \count($from);
        $cTo     = \count($to);

        for ($i = 0; $i < $cFrom; $i++) {
            $prev = $current;

            for ($j = 0; $j < $cTo; $j++) {
                if ($from[$i] === $to[$j]) {
                    $current[$j + 1] = $prev[$j] + 1;
                } else {
                    $current[$j + 1] = \max($current[$j], $prev[$j + 1]);
                }
            }
        }

        return $current;
    }
}