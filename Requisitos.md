# Requisitos

Una pequeña start-up comienza un ambicioso proyecto para crear un market-place tecnológico. Desde negocio quieren tener
un pequeño piloto en producción lo antes posible. Esta primera versión tendrá funcionalidades reducidas que irán
creciendo durante mucho tiempo. Desde el departamento técnico se ponen las expectativas más altas para el producto. El
requisito principal es realizar un proyecto altamente tolerable al cambio. Los objetivos son:

1. Crea una estructura para un proyecto que aplique un diseño táctico siguiendo principios de DDD. Durante el
   desarrollo, en la medida de lo posible define un diseño estratégico usando un lenguaje ubicuo.
2. Define los límites de los contextos, módulos y/o agregados teniendo en cuenta que aunque ahora mismo su dominio es
   pequeño y con pocas responsabilidades pero en el futuro este debe crecer de manera independiente.
3. El dominio debe proteger las siguientes invariantes:

- Un usuario solo puede tener 1 carrito activo simultáneamente.
- Un usuario puede tener varios carritos finalizados.
- Un carrito de la compra tiene como máximo 3 productos
- No se pueden añadir productos a un carrito finalizado.
- Al finalizar el carrito se envía a la dirección.
- El ńumero máximo de productos para un envío es de 3
- La dirección de envío no puede modificarse después de confirmar el envío

4. Define los puntos de entrada de la aplicación que modifican el dominio desde el exterior.
