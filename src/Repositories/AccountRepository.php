<?php

namespace Pagos360\Repositories;

use Pagos360\ModelFactory;
use Pagos360\Models\Account;
use Pagos360\Types;

class AccountRepository extends AbstractRepository
{
    const MODEL = Account::class;
    const API_URI = 'account';

    const EDITABLE = false;
    const FIELDS = [
        'id' => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::STRING,
        ],
        'type' => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::STRING,
        ],
        "availableBalance" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::FLOAT,
            self::PROPERTY_PATH => 'available_balance',
        ],
        "unavailableBalance" => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::FLOAT,
            self::PROPERTY_PATH => 'available_balance',
        ],
        'availableChannelTypes' => [
            self::FLAG_READONLY => true,
            self::TYPE => Types::ARRAY_OF_STRINGS,
            self::PROPERTY_PATH => 'available_channel_types',
        ],
    ];

    /**
     * @return Account
     */
    public function get(): Account
    {
        $url = sprintf('%s', self::API_URI);
        $fromApi = $this->restClient->get($url);

        return ModelFactory::build(Account::class, $fromApi);
    }
}
