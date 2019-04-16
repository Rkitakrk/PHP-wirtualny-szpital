<?php
/**
 * PHP-Router
 *
 * @package PHProuter
 * @version 1.0
 * @author Vezuwio
 */
namespace Component\Router;

/**
 * Contain and process single route
 *
 * Contain whole range of information about single route.
 * Process individual components of route.
 *
 */
class Route
{

    /** @var string Defines type of HTTP Method. */
    private $request_method;

    /** @var string Specifies unprocessed uri. */
    private $uri;

    /** @var string Name of controller and its method loaded in specified uri. */
    private $controller;

    /** @var array Constraint to every uri part which require it. */
    private $constraints;

    /** @var string Pattern(RegExp) to match uri. */
    private $uri_pattern;


    /**
     * Route constructor.
     * @param string $request_method
     * @param string $uri
     * @param string $controller
     * @param array $constraints
     * @throws \Exception
     */
    public function __construct($request_method, $uri, $controller, $constraints = [])
    {
        $this->request_method = $request_method;
        $this->uri = trim($uri, '/');
        $this->controller = $controller;
        $this->constraints = $constraints;

        if(self::ifShouldContainConstraint()){
            $this->uri_pattern = self::preparePatternWithConstraint();
        } else {
            $this->uri_pattern = self::preparePattern();
        }

    }

    /**
     * Prepare uri_pattern of URI which not contain constraint.
     *
     * @return string
     */
    private function preparePattern()
    {
        $pattern = '/^(';
        $split_uri = explode('/', $this->uri);

        // Check every Piece of uri
        foreach ($split_uri as $part) {

            $pattern .= '\/' . $part;

        }

        $pattern .= '){1}$/';
        return $pattern;
    }

    /**
     * Prepare uri_pattern for URI with specified constraints.
     *
     * Divide URI on segments and if any segment is determined as contained constraint it is sends to processing.
     *
     * @return string
     * @throws \Exception
     */
    private function preparePatternWithConstraint()
    {
        $pattern = '/^(';
        $split_uri = explode('/', $this->uri);

        // Check every Piece of uri
        foreach ($split_uri as $part) {

            // check piece with constraint
            if (preg_match("/^{[a-zA-Z0-9]+(\?)?}$/", $part)) {
                $pattern .= self::processUriPieceWithConstraint($part);
            } else {
                $pattern .= '\/' . $part;
            }

        }

        $pattern .= '){1}$/';
        return $pattern;
    }

    /**
     * Process delivered segment of URI.
     *
     * @param string $piece
     * @return string
     * @throws \Exception
     */
    private function processUriPieceWithConstraint($piece)
    {
        $piece_name = trim($piece, "{?}");
        $pattern = '';
        if(isset($this->constraints[$piece_name])){

            $pattern = "((\/)(" . $this->constraints[$piece_name] . "){1,})";
            if(strpos($piece, '?'))
            {
                $pattern .= "?";
            }
        } else {
            throw new \Exception("Constraint for {$piece} piece of uri is not defined!");
        }

        return $pattern;
    }

    /**
     * Check if URI's segments contain constraint.
     *
     * @return int
     * @throws \Exception
     */
    private function ifShouldContainConstraint()
    {

        if (preg_match('/{[a-zA-Z0-9]+(\?)?}/', $this->uri)){
            if (empty($this->constraints)){
                throw new \Exception("Route should had defined constraints!");
            }
            return 1;
        }
        return 0;

    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->request_method;
    }

    /**
     * @param string $request_method
     */
    public function setRequestMethod($request_method)
    {
        $this->request_method = $request_method;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getUriPattern()
    {
        return $this->uri_pattern;
    }

    /**
     * @param string $uri_pattern
     */
    public function setUriPattern($uri_pattern)
    {
        $this->uri_pattern = $uri_pattern;
    }

}