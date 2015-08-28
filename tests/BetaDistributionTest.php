<?php

class BetaDistributionTest extends PHPUnit_Framework_TestCase
{

    protected $a_minimum = 1;
    protected $a_maximum = 10000;
    protected $b_minimum = 1;
    protected $b_maximum = 10000;

    protected $number_of_samples = 10000;

    protected $precision = 3; //3 decimal places

    /**
     * The mean of the beta deviates B(a,b) should be about equal to a/(a+b).
     *
     * E[B(a,b)] = a / (a + b)
     */
    public function testBetaDistributionMean()
    {
        $a = rand($this->a_minimum, $this->a_maximum);
        $b = rand($this->b_minimum, $this->b_maximum);

        $data_points = [];
        for($i = 0; $i < $this->number_of_samples; ++$i) {
            $data_points[] = generate_random_beta_variate($a, $b);
        }

        $expected_mean = $a / ($a + $b);
        $beta_mean = calculate_mean($data_points);

        $this->assertEquals(round($expected_mean, $this->precision), round($beta_mean, $this->precision), "The mean of the beta deviates does not equal a/(a+b)");
    }

    /**
     *
     * V[B(a,b)] = (a * b) / ((a + b + 1) * (a + b)^2)
     */
    public function testBetaDistributionVariance()
    {
        $a = rand($this->a_minimum, $this->a_maximum);
        $b = rand($this->b_minimum, $this->b_maximum);

        $beta_squared_sum = 0;
        for($i = 0; $i < $this->number_of_samples; ++$i) {
            $data_points[] = generate_random_beta_variate($a, $b);
        }

        $expected_variance = ($a * $b) / (($a + $b + 1) * pow($a + $b, 2));
        $beta_variance = calculate_variance($data_points);

        $this->assertEquals(round($expected_variance, $this->precision), round($beta_variance, $this->precision), "The variance of the beta deviates is not in the acceptable range.");
    }

}
