<?php

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    // /** @return static */
    // public function extends();

    /**
     * Set the title for the view.
     *
     * @param string $title
     * @return static
     */
    public function title(string $title);

    /**
     * To HTML for the view.
     *
     * @return string
     */
    public function toHtml();
}
