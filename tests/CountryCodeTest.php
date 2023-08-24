<?php

use App\Controllers\Helper;

test('Test country code', function () {
    expect(Helper::getCountryNameFromCode('lv'))->toEqual("Latvia");
    expect(Helper::getCountryNameFromCode('mx'))->toEqual("Mexico");
    expect(Helper::getCountryNameFromCode('it'))->toEqual("Italy");
});
