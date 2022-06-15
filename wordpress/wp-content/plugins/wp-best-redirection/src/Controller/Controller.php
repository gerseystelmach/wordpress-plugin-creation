<?php

namespace WPBestRedirection\Controller;

use http\Exception\InvalidArgumentException;

class Controller
{
    public function render(string $template, array $data = []): string
    {
        $filename = __DIR__ . '/../../templates/' . $template;
        if (!is_file($filename)) {
            throw new InvalidArgumentException('Template not found : ' . $template);
        }
        // The use of include direct causes a side effect "Effet de bord". So i need to do that:
        // The method below blocks the exhibition of the page to the client.
        ob_start();
        // Call the html template and show it to the client
        include $filename;
        // This will recover and shows the content.
        $content = ob_get_clean();
        return $content;
    }
}
