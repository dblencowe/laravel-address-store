<?php

namespace VisualSignal\AddressStore;

use Illuminate\Database\Eloquent\Model;

class AddressStore extends Model
{
    protected $fillable = [
        'label',
        'street_number',
        'number_suffix',
        'street_name',
        'street_type',
        'street_direction',
        'address_type',
        'address_type_identifier',
        'minor_municipality',
        'major_municipality',
        'governing_district',
        'postal_identifier',
        'country_code',
    ];

    public function __construct()
    {
        $config = config('address_store');
        if ($config['use_uuids'] && ! $this instanceof UUIDAddressStore) {
            throw new \RuntimeException('UUIDs enabled. Please use ' . UUIDAddressStore::class);
        }

        $this->table = $config['table_name'];
    }
    
    public static function rules()
    {
        return [
            'label' => 'required|string',
            'street_number' => 'nullable,integer',
            'number_suffix' => 'nullable|string',
            'street_name' => 'required|string',
            'street_type' => 'nullable|string',
            'street_direction' => 'nullable|string',
            'address_type' => 'nullable|string',
            'address_type_identifier' => 'nullable|string',
            'minor_municipality' => 'nullable|string',
            'major_municipality' => 'required|string',
            'governing_district' => 'required|string',
            'postal_identifier' => 'required|string',
            'country_code' => 'required|string|max:2',
        ];
    }

    public function toString($format = null, $separator = PHP_EOL)
    {
        if (! $format) {
            $format = config('address_store.format');
        }
        $string = "";
        foreach ($format as $column) {
            $string .= $this->$column . $separator;
        }

        return $string;
    }
}