<?php

namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\ContentWithImagesElement;
use BiffBangPow\Extension\SortableExtension;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataObject;

class MultiContentItem extends DataObject
{
    private static $table_name = 'ContentImagesItem';
    private static $db = [
        'Title' => 'Varchar',
        'Content' => 'HTMLText',
        'ImageFirst' => 'Boolean',
        'BlockWidth' => 'Varchar'
    ];
    private static $has_one = [
        'Image' => Image::class,
        'Element' => ContentWithImagesElement::class
    ];
    private static $defaults = [
        'ImageFirst' => true
    ];
    private static $owns = [
        'Image'
    ];
    private static $singular_name = 'Content block';
    private static $plural_name = 'Content blocks';
    private static $extensions = [
        SortableExtension::class
    ];
    private $blockwidths = [
        'col-md-12' => 'Full width',
        'col-md-9' => '3/4 width',
        'col-md-8' => '2/3 width',
        'col-md-6' => '1/2 width',
        'col-md-4' => '1/3 width',
        'col-md-3' => '1/4 width'
    ];

    public function getCMSFields()
    {
     $fields = parent::getCMSFields();
     $fields->removeByName(['ElementID']);
     $fields->addFieldsToTab('Root.Main', [
         DropdownField::create('BlockWidth', 'Large screen block width', $this->blockwidths)
         ->setDescription('The width of this block on large screens.  On small screens, the block will be full-width')
     ]);
     $fields->dataFieldByName('Image')->setAllowedFileCategories('image/supported')->setFolderName('ContentImages');
     return $fields;
    }
}
