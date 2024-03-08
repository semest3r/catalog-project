export default function ProductItem({name, image_url}) {
  return (
    <div className="bg-white">
      <img src={image_url} />
      <p className="py-2 text-center font-medium">{name}</p>
    </div>
  );
}
