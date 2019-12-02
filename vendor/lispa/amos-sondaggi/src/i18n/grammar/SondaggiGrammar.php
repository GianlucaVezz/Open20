<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\sondaggi\i18n\grammar
 * @category   CategoryName
 */

namespace lispa\amos\sondaggi\i18n\grammar;

use lispa\amos\core\interfaces\ModelGrammarInterface;
use lispa\amos\sondaggi\AmosSondaggi;

/**
 * Class SondaggiGrammar
 * @package lispa\amos\sondaggi\i18n\grammar
 */
class SondaggiGrammar implements ModelGrammarInterface
{
    /**
     * @inheritdoc
     */
    public function getModelSingularLabel()
    {
        return AmosSondaggi::t('amossondaggi', '#sondaggi_singular');
    }

    /**
     * @inheritdoc
     */
    public function getModelLabel()
    {
        return AmosSondaggi::t('amossondaggi', '#sondaggi_plural');
    }

    /**
     * @inheritdoc
     */
    public function getArticleSingular()
    {
        return AmosSondaggi::t('amossondaggi', '#sondaggi_article_singular');
    }

    /**
     * @inheritdoc
     */
    public function getArticlePlural()
    {
        return AmosSondaggi::t('amossondaggi', '#sondaggi_article_plural');
    }

    /**
     * @inheritdoc
     */
    public function getIndefiniteArticle()
    {
        return AmosSondaggi::t('amossondaggi', '#sondaggi_indefinite_article');
    }
}
