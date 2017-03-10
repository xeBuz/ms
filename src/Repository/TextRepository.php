<?php

namespace Mono\Repository;

use Mono\Entity\Language;
use Mono\Entity\Reseller;

class TextRepository extends MonoRepository
{

    /**
     * @param Reseller $reseller
     * @param Language $language
     */
    public function getTextByResellerAndLanguage(Reseller $reseller, Language $language) {

    }

    /**
     * @param Reseller $reseller
     */
    public function getTextByReseller(Reseller $reseller) {

    }
}