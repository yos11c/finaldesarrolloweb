<template>
    <div>
        <h2>Imágenes de Picsum</h2>
        <ul class="grid-container">
            <li v-for="item in items" :key="item.id" class="image-card">
                <p>Autor: {{ item.author }}</p>
                <img :src="item.download_url" :alt="`Imagen de ${item.author}`" width="200" />
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: []
        };
    },
    mounted() {
        fetch("/api/picsum")
            .then(response => response.json())
            .then(data => {
                console.log(data); // Verificar que los datos contienen los campos necesarios
                this.items = data;
            })
            .catch(error => console.error("Error al consumir la API:", error));
    }
};
</script>

<style scoped>
body {
    font-family: Arial, sans-serif;
}
.grid-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Dos columnas */
    gap: 15px; /* Espaciado entre las columnas */
}
.image-card {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
}
.image-card img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}
</style>
