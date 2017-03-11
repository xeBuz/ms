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
     * @param bool $fallback
     * @return Text
     */
    public function getByKeyAndResellerAndLanguage($key, Reseller $reseller, Language $language, $fallback = true) {

        $sql = "SELECT id, `key`, `value`, reseller_id, language_id 
                FROM texts 
                WHERE `key` LIKE ? AND reseller_id = ? AND language_id = ?";

        $text = $this->fetchOne(
            $sql,
            [(string) $key, $reseller->getId(), $language->getId()]
        );

        if (empty($text) and ($fallback)) {
            $text = $this->getByKeyAndResellerByDefault($key, $reseller);
        }

        return $text;
    }

    /**
     * @param $key
     * @param Reseller $reseller
     * @return mixed
     */
    public function getByKeyAndResellerByDefault($key, Reseller $reseller) {

        $sql = "SELECT t.id, t.`key`, t.`value`, t.reseller_id, t.language_id 
                FROM texts AS t
                INNER JOIN resellers AS r ON t.reseller_id = r.id
                WHERE `key` LIKE ?
                AND r.id = ? 
                AND t.language_id = r.default_language_id";

        return $this->fetchOne(
            $sql,
            [(string) $key, $reseller->getId()]
        );
    }
}