// Efek 3D hover pada thumbnail
document.addEventListener('DOMContentLoaded', () => {
    const thumbs = document.querySelectorAll('.thumb');
    
    thumbs.forEach(thumb => {
        thumb.addEventListener('mousemove', (e) => {
            const rect = thumb.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y -
