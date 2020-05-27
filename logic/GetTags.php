<?php
class GetTags{
    public function get($url)
    {
        libxml_use_internal_errors(true);
        $doc = new DomDocument();
        $doc->loadHTML(file_get_contents($url));
        $xpath = new DOMXPath($doc);
        $query = '//*/meta[starts-with(@property, \'og:\')]';
        $metas = $xpath->query($query);
        $tags = array();
        foreach ($metas as $meta) {
            $property = $meta->getAttribute('property');
            $content = $meta->getAttribute('content');
            $tags[$property] = $content;
        }
        return $tags;
    }
}
?>