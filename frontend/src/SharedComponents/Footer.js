'use client';

import { createSubscriberAPI } from "@/api/api";
import { useRef, useState } from "react";

export default function SharedFooter() {
  const [isSubscribed, setIsSubscribed] = useState(false);
  const emailRef = useRef();
  const handleSubmitSubscribe = async () => {
    try {
      const response = await createSubscriberAPI({
        email: emailRef.current.value,
      });
      if (response.status === 201) {
        setIsSubscribed(true);
      }
    } catch (err) {
      console.log(err);
    }
  };
  return (
    <footer className="px-16 pt-12 pb-6 bg-primary-2 space-y-8">
      <div className="sm:flex sm:justify-between space-y-4">
        <div>
          <h1 className="text-2xl text-primary-6 font-bold">StorySewn</h1>
          <p className="text-primary-5 font-semibold">
            Preserving Memories & Exploring Stories
          </p>
        </div>
        <div className="sm:flex sm:gap-4 space-y-4 sm:space-y-0">
          <ul className="sm:px-4">
            <li className="text-primary-6 font-medium">Men</li>
            <li className="text-primary-6 font-medium">Women</li>
            <li className="text-primary-6 font-medium">Collaboration</li>
          </ul>
          <ul className="sm:px-4">
            <li className="text-primary-6 font-medium">About Us</li>
            <li className="text-primary-6 font-medium">Term</li>
            <li className="text-primary-6 font-medium">Contact</li>
          </ul>
          <div className="space-y-8">
            {isSubscribed ? (
              <p className="text-primary-6 font-medium">
                Thanks for being part of us
              </p>
            ) : (
              <div className="space-y-2">
                <p className="text-primary-6 font-medium">
                  Subscribe now and get connected with us.
                </p>
                <input
                  ref={emailRef}
                  className="block w-[220px] px-4 py-2 focus:outline-none"
                  placeholder="Email address"
                />
                <button
                  onClick={handleSubmitSubscribe}
                  className="px-6 py-2 bg-primary-5 text-primary-1 font-medium"
                >
                  Subscribe
                </button>
              </div>
            )}{" "}
            <ul className="flex gap-2">
              <li>
                <PajamasTwitter />
              </li>
              <li>
                <MdiInstagram />
              </li>
              <li>
                <MingcuteWhatsappLine />
              </li>
            </ul>
          </div>
        </div>
      </div>
      <p className="text-center text-primary-5 font-medium">
        StorySewn 2024, All Rights Reserverd
      </p>
    </footer>
  );
}

function MingcuteWhatsappLine(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="30px"
      height="30px"
      className="text-primary-6"
      viewBox="0 0 24 24"
      {...props}
    >
      <g fill="none">
        <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"></path>
        <path
          fill="currentColor"
          d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.958 9.958 0 0 1-4.863-1.26l-.305-.178l-3.032.892a1.01 1.01 0 0 1-1.28-1.145l.026-.109l.892-3.032A9.958 9.958 0 0 1 2 12C2 6.477 6.477 2 12 2m0 2a8 8 0 0 0-6.759 12.282c.198.312.283.696.216 1.077l-.039.163l-.441 1.501l1.501-.441c.433-.128.883-.05 1.24.177A8 8 0 1 0 12 4M9.102 7.184a.695.695 0 0 1 .684.075c.504.368.904.862 1.248 1.344l.327.474l.153.225a.712.712 0 0 1-.046.864l-.075.076l-.924.686a.227.227 0 0 0-.067.291c.21.38.581.947 1.007 1.373c.427.426 1.02.822 1.426 1.055c.088.05.194.034.266-.031l.038-.045l.601-.915a.711.711 0 0 1 .973-.158l.543.379c.54.385 1.059.799 1.47 1.324a.696.696 0 0 1 .089.703c-.396.924-1.399 1.711-2.441 1.673l-.159-.01l-.191-.018a4.966 4.966 0 0 1-.108-.014l-.238-.04c-.924-.174-2.405-.698-3.94-2.232c-1.534-1.535-2.058-3.016-2.232-3.94l-.04-.238l-.025-.208l-.013-.175a3.76 3.76 0 0 1-.004-.075c-.038-1.044.753-2.047 1.678-2.443"
        ></path>
      </g>
    </svg>
  );
}

function MdiInstagram(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="30px"
      height="30px"
      className="text-primary-6"
      viewBox="0 0 24 24"
      {...props}
    >
      <path
        fill="currentColor"
        d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"
      ></path>
    </svg>
  );
}

function PajamasTwitter(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="30px"
      height="30px"
      className="text-primary-6"
      viewBox="0 0 16 16"
      {...props}
    >
      <path
        fill="currentColor"
        d="M9.294 6.928L14.357 1h-1.2L8.762 6.147L5.25 1H1.2l5.31 7.784L1.2 15h1.2l4.642-5.436L10.751 15h4.05zM7.651 8.852l-.538-.775L2.832 1.91h1.843l3.454 4.977l.538.775l4.491 6.47h-1.843z"
      ></path>
    </svg>
  );
}
