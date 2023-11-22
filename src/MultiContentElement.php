<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Control\MultiContentElementController;
use BiffBangPow\Element\Model\MultiContentItem;
use BiffBangPow\Extension\ElementInlineUnEditable;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class MultiContentElement extends BaseElement
{
    private static $table_name = 'MultiContentElement';
    private static $has_many = [
        'ContentBlocks' => MultiContentItem::class
    ];
    private static $inline_editable = false;
    private static $cascade_deletes = [
        'ContentBlocks'
    ];
    private static $controller_class = MultiContentElementController::class;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $grid = GridField::create('ContentBlocks', 'Content Blocks', $this->ContentBlocks(),
            GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldOrderableRows()));
        $fields->addFieldsToTab('Root.Main', [
            $grid
        ]);
        return $fields;
    }

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'General Content');
    }

    public function getSimpleClassName()
    {
        return 'bbp-multicontent-element';
    }

}
