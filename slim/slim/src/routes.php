<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get("/", function(Request $request, Response $response, array $args){
    $lista = new Lista($this->db);
    $args['lista'] = $lista->getLista();
    
    return $this->renderer->render($response, 'home.phtml', $args);
});
$app->get("/add", function(Request $request, Response $response, array $args){
       
    return $this->renderer->render($response, 'add.phtml', $args);
});
$app->post("/add", function(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    $lista = new Lista($this->db);
    $lista->add($data);
    return $response->withStatus(302)->withHeader("Location","./");
});
$app->get("/edit/{id}", function(Request $request, Response $response, array $args){
    $lista = new Lista($this->db);
    $args['info'] = $lista->getContato($args['id']);

    return $this->renderer->render($response, 'edit.phtml', $args);
});
$app->post("/edit/{id}", function(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
    $lista = new Lista($this->db);
    $lista->atualizar($data,$args['id']);
    return $response->withStatus(302)->withHeader("Location","../");
});
$app->get("/del/{id}", function(Request $request, Response $response, array $args){
    $lista = new Lista($this->db);
    $args['info'] = $lista->apagar($args['id']);

    return $response->withStatus(302)->withHeader("Location","../");
});


