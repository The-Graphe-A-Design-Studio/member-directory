<?php

namespace Illuminate\Routing;

<<<<<<< HEAD
use Illuminate\Contracts\View\Factory as ViewFactory;
=======
use Illuminate\Contracts\Routing\ResponseFactory;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class ViewController extends Controller
{
    /**
<<<<<<< HEAD
     * The view factory implementation.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;
=======
     * The response factory implementation.
     *
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $response;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

    /**
     * Create a new controller instance.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
=======
     * @param  \Illuminate\Contracts\Routing\ResponseFactory  $response
     * @return void
     */
    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }

    /**
     * Invoke the controller method.
     *
     * @param  array  $args
<<<<<<< HEAD
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(...$args)
    {
        [$view, $data] = array_slice($args, -2);

        return $this->view->make($view, $data);
=======
     * @return \Illuminate\Http\Response
     */
    public function __invoke(...$args)
    {
        [$view, $data, $status, $headers] = array_slice($args, -4);

        return $this->response->view($view, $data, $status, $headers);
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
