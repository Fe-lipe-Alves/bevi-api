<?php

namespace Tests\Unit;

use App\Casts\Decimal;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

class DecimalTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_convert_decimal_to_integer(): void
    {
        $value = 16.90;
        $model = new class extends Model {};

        $cast = new Decimal();
        $result = $cast->set($model, '', $value, []);

        $this->assertEquals($result, 1690);
    }

    public function test_convert_integer_to_decimal(): void
    {
        $value = 1690;
        $model = new class extends Model {};

        $cast = new Decimal();
        $result = $cast->get($model, '', $value, []);

        $this->assertEquals($result, 16.90);
    }
}
