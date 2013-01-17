<?php

class DatagramSocket extends EventEmitter implements SendInterface
{
    public function __construct($loop, $socket, $address)
    {
        $this->loop = $loop;
        $this->socket = $socket;
        $this->address = $address;
    }
    
    public function getAddress()
    {
        // TODO: doc comment suggests IPv6 address is not enclosed in square brackets?
        return $this->address;
    }
    
    public function getPort()
    {
        return (int)substr($this->address, strrpos($this->address, ':') + 1);
    }
    
    public function getHost(){
        return trim(substr($this->address, 0, strrpos($this->address, ':'), '[]');
    }
    
    public function send($data)
    {
        stream_socket_sendto($this->socket, $data, 0, $this->address);
    }
    
    protected static function createAddress($host, $ip)
    {
        $address = $host;
        if (strpos($host, ':') !== false) {
            // enclose IPv6 address in square brackets
            $address = '[' . $host . ']';
        }
        $address .= $port;
    }
}
