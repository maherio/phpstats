# PhpStats
[![Build Status](https://travis-ci.org/maherio/phpstats.svg)](https://travis-ci.org/maherio/phpstats)

A php library containing useful advanced statistic modeling. Helps replace the unsupported PECL stats extension.

## What's included?
There are currently helper methods to do the following:
* Generating random Gaussian, Gamma, and Beta variates
* Calculating the mean and variance of a data set


## Usage
To use this library, just install via composer:
```
composer require maherio/phpstats
```

The functions are now globally accessible. Here are a couple examples:

Generate a random beta variate:
```
$a = 10;
$b = 1500;
$beta_variate = generate_random_beta_variate($a, $b);
```

Calculate the variance of a data set:
```
$data_set = [1,3,5,1,6,15,2,1];
$variance = calculate_variance($data_set);
```


### Copyright

Note: this library was created from the NumPy open source library with little modification other than transcoding from python into php.


Copyright © 2005-2013, NumPy Developers.

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

Neither the name of the NumPy Developers nor the names of any contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS “AS IS” AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
