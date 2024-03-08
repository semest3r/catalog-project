'use client';
import ProductItem from "./ProductItem";

export default function ProductList({ products }) {
  return (
    <div className="grid grid-cols-4 gap-4">
      {products.map((product) => (
        <ProductItem key={product.id} name={product.name} image_url={product.image_url}/>
      ))}
    </div>
  );
}
