<?php

function calculate_mean($data_set = array())
{
    return array_sum($data_set) / count($data_set);
}

function calculate_variance($data_set = array())
{
    $mean = calculate_mean($data_set);

    $squared_sum = 0.0;
    foreach ($data_set as $data_point) {
        $deviation_from_mean = $data_point - $mean;
        $squared_sum += pow($deviation_from_mean, 2);
    }

    return $squared_sum / count($data_set);
}

function generate_random_double($min = 0.0, $max = 1.0)
{
    $decimal = mt_rand() / mt_getrandmax();
    return $min + ($decimal * $max);
}

function generate_random_gaussian_variate()
{
    do {
        $x1 = (2.0 * generate_random_double()) - 1.0;
        $x2 = (2.0 * generate_random_double()) - 1.0;
        $r2 = pow($x1, 2) + pow($x2,2);
    }
    while ($r2 >= 1.0 || $r2 == 0.0);

    /* Box-Muller transform */
    $f = sqrt((-2.0*log($r2))/$r2);
    return $f*$x2;
}

function generate_random_beta_variate($a, $b)
{
    if ($a <= 1.0 && $b <= 1.0) {
        while (true) {
            $u = generate_random_double();
            $v = generate_random_double();
            $x = pow($u, 1.0/$a);
            $y = pow($v, 1.0/$b);

            if(($x + $y) <= 1.0) {
                return $x / ($x + $y);
            }
        }
    } else {
        $gamma_a = generate_gamma_variate($a);
        $gamma_b = generate_gamma_variate($b);

        return $gamma_a / ($gamma_a + $gamma_b);
    }
}

function generate_gamma_variate($shape)
{
    if ($shape == 1.0) {
        return -log(1.0 - generate_random_double());
    } else if ($shape < 1.0) {
        while(true) {
            $u = generate_random_double();
            $v = -log(1.0 - generate_random_double());

            if($u <= 1.0 - $shape) {
                $x = pow($u, 1.0/$shape);

                if($x <= $v) {
                    return $x;
                }
            } else {
                $y = -log((1.0 - $u)/$shape);
                $x = pow(1.0 - $shape + ($shape*$y),1.0/$shape);

                if($x <= ($v + $y)) {
                    return $x;
                }
            }
        }
    } else {
        $b = $shape - (1.0/3.0);
        $c = 1.0 / sqrt(9*$b);
        while(true) {
            do {
                $x = generate_random_gaussian_variate();
                $v = 1.0 + ($c*$x);
            } while($v <= 0.0);

            $v = pow($v, 3);
            $u = generate_random_double();

            if($u < 1.0 - (0.0331*pow($x, 4)) || (log($u) < (0.5*pow($x, 2)) + ($b * (1.0 - $v + log($v))))) {
                return $b * $v;
            }
        }
    }
}
