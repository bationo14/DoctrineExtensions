<?php

namespace Gedmo\Fixture\References\ODM\MongoDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Fixture\References\ORM\Category;

/**
 * @ODM\EmbeddedDocument
 */
class Metadata
{
    /**
     * @ODM\Field(type="string")
     */
    private $name;

    /**
     * @Gedmo\ReferenceOne(class="Gedmo\Fixture\References\ORM\Category", identifier="categoryId")
     */
    private $category;

    /**
     * @ODM\Field(type="int")
     */
    private $categoryId;

    public function __construct(Category $category)
    {
        $this->setCategory($category);
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
        $this->categoryId = $category->getId();
    }

    public function getCategory()
    {
        return $this->category;
    }
}
