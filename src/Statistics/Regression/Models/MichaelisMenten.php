<?php
namespace Math\Statistics\Regression\Models;

/**
 * The Michaelis-Menten equation is used to model enzyme kinetics.
 *       V * x
 * y = ----------
 *       K + x
 *
 *
 * https://en.wikipedia.org/wiki/Michaelis%E2%80%93Menten_kinetics
 */
trait MichaelisMenten
{
    protected static $V = 0; // V parameter index
    protected static $K = 1; // K parameter index

    /**
     * Get regression parameters (V and K)
     *
     * @param array $params
     *
     * @return array [ V => number, K => number ]
     */
    public static function getModelParameters(array $params): array
    {
        return [
            'V' => $params[self::$V],
            'K' => $params[self::$K],
        ];
    }
    /**
     * Get regression equation (y = V * X / (K + X))
     *
     * @param array $params
     *
     * @return string
     */
    public static function getModelEquation(array $params): string
    {
        return sprintf('y = %fx/(%f+x)', $params[self::$V], $params[self::$K]);
    }
    /**
     * Evaluate the equation using the regression parameters
     * y = (V * X) / (K + X)
     *
     * @param number $x
     * @param array  $params
     *
     * @return number y evaluated
     */
    public static function evaluateModel($x, array $params)
    {
        $V = $params[self::$V];
        $K = $params[self::$K];

        return ($V * $x) / ($K + $x);
    }
}
