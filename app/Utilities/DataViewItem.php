<?php

namespace App\Utilities;

class DataViewItem
{

    public $title;
    public $viewName;
    public $value;
    public $widthClasses;
    public $type;
    public $extras = [];

    public $items = [];
    public $objects = [];

    private static function constructBase(string $widthClasses, string $type): DataViewItem
    {
        $item = new DataViewItem;
        $item->widthClasses = $widthClasses;
        $item->type = $type;
        return $item;
    }

    public static function text(string $title, string $value, string $widthClasses): DataViewItem
    {
        $item = self::constructBase($widthClasses, "text");
        $item->title = $title;
        $item->value = $value;
        return $item;
    }

    public static function boolean(string $title, bool $value, string $widthClasses): DataViewItem
    {
        $item = self::constructBase($widthClasses, "text");
        $item->title = $title;
        $item->value = $value ? "Da" : "Ne";
        return $item;
    }

    public static function anchor(string $title, string $href, string $widthClasses, string $classes): DataViewItem
    {
        $item = self::constructBase($widthClasses, "anchor");
        $item->title = $title;
        $item->value = $href;
        $item->extras["classes"] = $classes;
        return $item;
    }

    public static function richText(string $title, string $value, string $widthClasses): DataViewItem
    {
        $item = self::constructBase($widthClasses, "richText");
        $item->title = $title;
        $item->value = $value;
        return $item;
    }

    public static function button(string $title, string $value, string $widthClasses, string $classes = 'btn btn-sm btn-primary'): DataViewItem
    {
        $item = self::constructBase($widthClasses, "button");
        $item->title = $title;
        $item->value = $value;
        $item->extras["classes"] = $classes;
        return $item;
    }

    public static function formButton(string $title, string $value, string $widthClasses, string $classes, array $data, ?string $method = 'POST', ?bool $confirmable = false): DataViewItem
    {
        $item = self::constructBase($widthClasses, "formButton");
        $item->title = $title;
        $item->value = $value;
        $item->extras["classes"] = $classes;
        $item->extras["data"] = $data;
        $item->extras["method"] = $method;
        $item->extras["confirmable"] = $confirmable;
        return $item;
    }

    public static function category(?string $title, string $widthClasses): DataViewItem
    {
        $item = self::constructBase($widthClasses, "category");
        $item->title = $title;
        return $item;
    }

    public static function subCategory(?string $title, string $widthClasses, bool $borderOnlyText): DataViewItem
    {
        $item = self::constructBase($widthClasses, "subCategory");
        $item->title = $title;
        $item->extras["border_only_text"] = $borderOnlyText;
        return $item;
    }

    public static function badge(string $value, string $widthClasses, string $styleClasses, ?string $title = null): DataViewItem
    {
        $item = self::constructBase($widthClasses, "badge");
        $item->title = $title;
        $item->value = $value;
        $item->extras["classes"] = $styleClasses;
        return $item;
    }

    public static function component(string $viewName, array $objects, string $widthClasses = "col-12"): DataViewItem
    {
        $item = self::constructBase($widthClasses, "component");
        $item->viewName = $viewName;
        $item->objects = $objects;
        return $item;
    }

    public function addItem(DataViewItem $item): DataViewItem
    {
        $this->items[] = $item;
        return $this;
    }
}
