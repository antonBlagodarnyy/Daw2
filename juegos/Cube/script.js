import * as THREE from "https://unpkg.com/three@0.142.0/build/three.module.js";

let range = document.getElementById("rango");

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

let cubes = [];

function createCubes(w, h, d) {
	let geometry = new THREE.BoxGeometry(w, h, d);
	let edges = new THREE.EdgesGeometry(geometry);
	let line = new THREE.LineSegments(edges, new THREE.LineBasicMaterial({ color: "green" }));

	cubes.push(line);
}

for (let i = 0; i < 5; i++) {
	createCubes(i, i, i);
}

cubes.forEach(cube => {
	scene.add(cube);
});



camera.position.z = 5;

function animate() {
	renderer.render(scene, camera);

for (let i = 0; i < cubes.length; i++) {
	const cube = cubes[i];
	if(i%2==0){
		cube.rotation.x += parseFloat(range.value);
		cube.rotation.y += parseFloat(range.value);
	}else{
		cube.rotation.x -= parseFloat(range.value);
		cube.rotation.y -= parseFloat(range.value);
	}

}
}
renderer.setAnimationLoop(animate);
