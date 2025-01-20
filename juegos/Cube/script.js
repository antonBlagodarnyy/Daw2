import * as THREE from 'three/src/Three.js';

let range = document.getElementById("rango");

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

const geometry = new THREE.BoxGeometry( 2, 2, 2 ); 
const edges = new THREE.EdgesGeometry( geometry ); 
const line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial( { color: "green" } ) ); 
scene.add( line );

camera.position.z = 5;

function animate() {
	renderer.render( scene, camera );
line.rotation.x += parseFloat(range.value);
line.rotation.y += parseFloat(range.value);
}
renderer.setAnimationLoop( animate );
