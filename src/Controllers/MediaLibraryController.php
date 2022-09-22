<?php

namespace RobChett\Laraberg\Controllers;

use Illuminate\Http\Request;
use RobChett\Laraberg\Blocks\Block;

class MediaLibraryController {

    public function show(Request $request) {
        // $request->validate([
        //     'blockName' => ['required', 'string'],
        //     'attributes' => ['array']
        // ]);

        return [
            'media-library' => \App\Models\Image::all()->map(fn(\App\Models\Image $i) => [
                "id"                    => $i->id,
                "title"                 => $i->title,
                "filename"              => basename($i->image->get('_')->src),
                "url"                   => $i->image->get('_')->src(),
                "link"                  => "",
                "alt"                   => $i->image->alt(),
                "author"                => "",
                "description"           => "",
                "caption"               => "",
                "name"                  => $i->title,
                "status"                => "inherit",
                "uploadedTo"            => 97589,
                "date"                  => (string)$i->created_at,
                "modified"              => (string)$i->updated_at,
                "menuOrder"             => 0,
                "mime"                  => "image/jpeg",
                "type"                  => "image",
                "subtype"               => "jpeg",
                "icon"                  => "https://wordpress.org/gutenberg/wp-includes/images/media/default.png",
                "dateFormatted"         => $i->created_at->format('F j, Y'),
                "nonces"                => [
                    "update" => false,
                    "delete" => false,
                    "edit"   => false,
                ],
                "editLink"              => false,
                "meta"                  => false,
                "authorName"            => "",
                "authorLink"            => "",
                "uploadedToTitle"       => "",
                "uploadedToLink"        => null,
                "filesizeInBytes"       => $i->image->get('_')->size,
                "filesizeHumanReadable" => $i->image->get('_')->size,
                "context"               => "",
                "height"                => $i->image->get('_')->h,
                "width"                 => $i->image->get('_')->w,
                "orientation"           => $i->image->get('_')->h <= $i->image->get('_')->w ? "landscape" : "portrait",
                "sizes"                 => (new \Illuminate\Support\Collection($i->image->getAll()))->reduce(fn(array $acc, \Evosite\OxygenCms\Image $size) => [...$acc, ...[
                    $size->type => [
                        "height"      => $size->h,
                        "width"       => $size->w,
                        "url"         => $size->src(),
                        "orientation" => $size->h <= $i->w ? "landscape" : "portrait",
                    ],
                ]], []),
                "compat"                => [
                    "item" => "",
                    "meta" => "",
                ],
            ]),
        ];
    }
}
