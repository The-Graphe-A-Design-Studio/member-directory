<?php

namespace Illuminate\View\Concerns;

use Closure;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use InvalidArgumentException;

trait ManagesComponents
{
    /**
     * The components being rendered.
     *
     * @var array
     */
    protected $componentStack = [];

    /**
     * The original data passed to the component.
     *
     * @var array
     */
    protected $componentData = [];

    /**
     * The slot contents for the component.
     *
     * @var array
     */
    protected $slots = [];

    /**
     * The names of the slots being rendered.
     *
     * @var array
     */
    protected $slotStack = [];

    /**
     * Start a component rendering process.
     *
<<<<<<< HEAD
     * @param  \Illuminate\View\View|\Closure|string  $view
=======
     * @param  \Illuminate\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string  $view
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
     * @param  array  $data
     * @return void
     */
    public function startComponent($view, array $data = [])
    {
        if (ob_start()) {
            $this->componentStack[] = $view;

            $this->componentData[$this->currentComponent()] = $data;

            $this->slots[$this->currentComponent()] = [];
        }
    }

    /**
     * Get the first view that actually exists from the given list, and start a component.
     *
     * @param  array  $names
     * @param  array  $data
     * @return void
     */
    public function startComponentFirst(array $names, array $data = [])
    {
        $name = Arr::first($names, function ($item) {
            return $this->exists($item);
        });

        $this->startComponent($name, $data);
    }

    /**
     * Render the current component.
     *
     * @return string
     */
    public function renderComponent()
    {
        $view = array_pop($this->componentStack);

        $data = $this->componentData();

        if ($view instanceof Closure) {
            $view = $view($data);
        }

        if ($view instanceof View) {
            return $view->with($data)->render();
<<<<<<< HEAD
=======
        } elseif ($view instanceof Htmlable) {
            return $view->toHtml();
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        } else {
            return $this->make($view, $data)->render();
        }
    }

    /**
     * Get the data for the given component.
     *
     * @return array
     */
    protected function componentData()
    {
<<<<<<< HEAD
        return array_merge(
            $this->componentData[count($this->componentStack)],
            ['slot' => new HtmlString(trim(ob_get_clean()))],
            $this->slots[count($this->componentStack)]
=======
        $defaultSlot = new HtmlString(trim(ob_get_clean()));

        $slots = array_merge([
            '__default' => $defaultSlot,
        ], $this->slots[count($this->componentStack)]);

        return array_merge(
            $this->componentData[count($this->componentStack)],
            ['slot' => $defaultSlot],
            $this->slots[count($this->componentStack)],
            ['__laravel_slots' => $slots]
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        );
    }

    /**
     * Start the slot rendering process.
     *
     * @param  string  $name
     * @param  string|null  $content
     * @return void
     */
    public function slot($name, $content = null)
    {
        if (func_num_args() > 2) {
            throw new InvalidArgumentException('You passed too many arguments to the ['.$name.'] slot.');
        } elseif (func_num_args() === 2) {
            $this->slots[$this->currentComponent()][$name] = $content;
        } elseif (ob_start()) {
            $this->slots[$this->currentComponent()][$name] = '';

            $this->slotStack[$this->currentComponent()][] = $name;
        }
    }

    /**
     * Save the slot content for rendering.
     *
     * @return void
     */
    public function endSlot()
    {
        last($this->componentStack);

        $currentSlot = array_pop(
            $this->slotStack[$this->currentComponent()]
        );

        $this->slots[$this->currentComponent()]
                    [$currentSlot] = new HtmlString(trim(ob_get_clean()));
    }

    /**
     * Get the index for the current component.
     *
     * @return int
     */
    protected function currentComponent()
    {
        return count($this->componentStack) - 1;
    }
}
