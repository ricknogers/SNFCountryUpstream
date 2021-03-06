<?php

/**
 * League.Uri (http://uri.thephpleague.com/components)
 *
 * @package    League\Uri
 * @subpackage League\Uri\Components
 * @author     Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @license    https://github.com/thephpleague/uri-components/blob/master/LICENSE (MIT License)
 * @version    2.0.2
 * @link       https://github.com/thephpleague/uri-components
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare (strict_types=1);
namespace GFPDF_Vendor\League\Uri\Components;

use GFPDF_Vendor\League\Uri\Contracts\AuthorityInterface;
use GFPDF_Vendor\League\Uri\Contracts\PortInterface;
use GFPDF_Vendor\League\Uri\Contracts\UriComponentInterface;
use GFPDF_Vendor\League\Uri\Contracts\UriInterface;
use GFPDF_Vendor\League\Uri\Exceptions\SyntaxError;
use Psr\Http\Message\UriInterface as Psr7UriInterface;
use TypeError;
use function filter_var;
use function sprintf;
use const FILTER_VALIDATE_INT;
final class Port extends \GFPDF_Vendor\League\Uri\Components\Component implements \GFPDF_Vendor\League\Uri\Contracts\PortInterface
{
    /**
     * @var int|null
     */
    private $port;
    /**
     * New instance.
     *
     * @param mixed|null $port
     */
    public function __construct($port = null)
    {
        $this->port = $this->validate($port);
    }
    public static function fromInt(int $port) : self
    {
        if (0 > $port) {
            throw new \GFPDF_Vendor\League\Uri\Exceptions\SyntaxError(\sprintf('Expected port to be a positive integer or 0; received %s.', $port));
        }
        $instance = new self();
        $instance->port = $port;
        return $instance;
    }
    /**
     * Validate a port.
     *
     * @param mixed|null $port
     *
     * @throws SyntaxError if the port is invalid
     */
    private function validate($port) : ?int
    {
        $port = self::filterComponent($port);
        if (null === $port) {
            return null;
        }
        $fport = \filter_var($port, \FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
        if (\false !== $fport) {
            return $fport;
        }
        throw new \GFPDF_Vendor\League\Uri\Exceptions\SyntaxError(\sprintf('Expected port to be a positive integer or 0; received %s.', $port));
    }
    /**
     * {@inheritDoc}
     */
    public static function __set_state(array $properties) : self
    {
        return new self($properties['port']);
    }
    /**
     * Create a new instance from a URI object.
     *
     * @param mixed $uri an URI object
     *
     * @throws TypeError If the URI object is not supported
     */
    public static function createFromUri($uri) : self
    {
        if ($uri instanceof \GFPDF_Vendor\League\Uri\Contracts\UriInterface || $uri instanceof \Psr\Http\Message\UriInterface) {
            return new self($uri->getPort());
        }
        throw new \TypeError(\sprintf('The object must implement the `%s` or the `%s` interface.', \Psr\Http\Message\UriInterface::class, \GFPDF_Vendor\League\Uri\Contracts\UriInterface::class));
    }
    /**
     * Create a new instance from a Authority object.
     */
    public static function createFromAuthority(\GFPDF_Vendor\League\Uri\Contracts\AuthorityInterface $authority) : self
    {
        return new self($authority->getPort());
    }
    /**
     * {@inheritDoc}
     */
    public function getContent() : ?string
    {
        if (null === $this->port) {
            return $this->port;
        }
        return (string) $this->port;
    }
    /**
     * {@inheritDoc}
     */
    public function getUriComponent() : string
    {
        return (null === $this->port ? '' : ':') . $this->getContent();
    }
    /**
     * {@inheritDoc}
     */
    public function toInt() : ?int
    {
        return $this->port;
    }
    /**
     * {@inheritDoc}
     */
    public function withContent($content) : \GFPDF_Vendor\League\Uri\Contracts\UriComponentInterface
    {
        $content = $this->validate(self::filterComponent($content));
        if ($content === $this->port) {
            return $this;
        }
        return new self($content);
    }
}
