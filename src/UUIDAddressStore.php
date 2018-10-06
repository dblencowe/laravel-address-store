<?php

namespace VisualSignal\AddressStore;

use VisualSignal\HasUUID\HasUUID;

class UUIDAddressStore extends AddressStore
{
    use HasUUID;

    public $incrementing = false;
}