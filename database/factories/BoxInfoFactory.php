<?php

namespace Database\Factories;

use App\Models\BoxInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoxInfo>
 */
class BoxInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = BoxInfo::class;
    public function definition(): array
    {
        $boxType = $this->faker->randomElement(['Jumbo', 'Large', 'Medium', 'Odd']);

        // Determine box dimensions based on box type
        switch ($boxType) {
            case 'Jumbo':
                $boxDimension = '24x18x24';
                break;
            case 'Large':
                $boxDimension = '23x17x20';
                break;
            case 'Medium':
                $boxDimension = '22x16x16';
                break;
            case 'Odd':
                // For odd dimensions, generate random dimensions
                $length = $this->faker->numberBetween(16, 30);
                $width = $this->faker->numberBetween(14, 20);
                $height = $this->faker->numberBetween(14, 30);
                $boxDimension = "{$length}x{$width}x{$height}";
                break;
        }

        return [
            'box_type' => $boxType,
            'box_dimension' => $boxDimension,
        ];
    }
}
