<?php

use App\Repositories\Helper;

test('Test country code correctness', function () {
    expect(Helper::isValidCountry('lv'))->toBe(true);
    expect(Helper::isValidCountry('mx'))->toBe(true);
    expect(Helper::isValidCountry('it'))->toBe(true);
    expect(Helper::isValidCountry('z'))->toBe(false);
});
