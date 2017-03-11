<?php

namespace Mono\Repository;

use Mono\Entity\Language;
use Mono\Entity\Reseller;
use Mono\Entity\Text;

class TextRepository extends MonoRepository
{

    /**
     * @param $key
     * @param Reseller $reseller
     * @param Language $language
     * @return Text
     */
    public function getByKeyAndResellerAndLanguage($key, Reseller $reseller, Language $language) {
        $sql = "SELECT id, key, value, reseller_id, language_id FROM text WHERE key LIKE ? AND reseller_id = ? AND language_id = ?";

        $text = $this->fetchOne(
            $sql,
            [(string) $key, $reseller->getId(), $language->getId()]
        );

        if (empty($text)) {
            return $text;
        }

        return Text::createFromArray($text);
    }

    /**
     * @param $key
     * @param Reseller $reseller
     * @return mixed
     */
    public function getByKeyAndReseller($key, Reseller $reseller) {
        $sql = "SELECT id, key, value, reseller_id, language_id FROM text WHERE key LIKE ? AND reseller_id = ? AND language_id = ?";

        $text = $this->fetchOne(
            $sql,
            [(string) $key, $reseller->getId()]
        );

        if (empty($text)) {
            return $text;
        }

        return Text::createFromArray($text);
    }
}