export default function Value() {
  return (
    <div className="space-y-6">
      <div className="p-1 border-b border-primary-3"></div>
      <div className="w-full grid grid-cols-3 place-content-center justify-items-center">
        <div className="space-y-2">
            <MingcuteScissorsLine />
            <p className="text-primary-7 font-semibold">Timeless Exclusives</p>
        </div>
        <div className="space-y-2">
            <MingcuteLoveLine />
            <p className="text-primary-7 font-semibold">Limited Products</p>
        </div>
        <div className="space-y-2">
            <MingcuteHandHeartLine />
            <p className="text-primary-7 font-semibold">Crafted by Professionals</p>
        </div>
      </div>
      <div className="p-1 border-b border-primary-3"></div>
    </div>
  );
}

function MingcuteScissorsLine(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="60px"
      height="60px"
      className="mx-auto text-primary-7"
      viewBox="0 0 24 24"
      {...props}
    >
      <g fill="none" fillRule="evenodd">
        <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"></path>
        <path
          fill="currentColor"
          d="M6.238 4.659a2 2 0 0 1 .491-2.786L12 9.401l5.271-7.528a2 2 0 0 1 .491 2.786l-4.541 6.486l2.22 3.17a4 4 0 1 1-1.59 1.217l-1.85-2.644l-1.852 2.645a4 4 0 1 1-1.59-1.217l2.22-3.171zM7 16a2 2 0 1 0 0 4a2 2 0 0 0 0-4m10 0a2 2 0 1 0 0 4a2 2 0 0 0 0-4"
        ></path>
      </g>
    </svg>
  );
}

function MingcuteLoveLine(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="60px"
      height="60px"
      className="mx-auto text-primary-7"
      viewBox="0 0 24 24"
      {...props}
    >
      <g fill="none" fillRule="evenodd">
        <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"></path>
        <path
          fill="currentColor"
          d="M14.125 19.972c-.222.164-.463.3-.728.37c-.746.2-1.561-.098-2.273-.298c-4.773-1.343-7.97-3.446-8.887-6.584c-.732-2.506-.028-5.016 1.52-6.576c1.434-1.445 3.56-2.031 5.741-1.092c1.42-1.904 3.555-2.46 5.519-1.925c2.12.577 3.984 2.399 4.603 4.935c.122.497.182 1.004.183 1.519c.255.13.497.292.72.48c1.157.979 1.775 2.642 1.43 4.371c-.44 2.206-2.485 3.755-5.41 4.861c-.501.19-1.049.425-1.596.329c-.304-.054-.576-.21-.822-.39m-9.968-7.073c-.535-1.833.003-3.581 1.02-4.606c.976-.984 2.423-1.35 4.023-.414c.559.327 1.28.133 1.6-.428c.918-1.611 2.354-2.018 3.691-1.654c1.394.38 2.734 1.624 3.186 3.479c.055.223.092.451.11.685a3.687 3.687 0 0 0-1.06.301c-1.074-1.047-2.496-1.253-3.75-.791c-1.422.523-2.572 1.875-2.84 3.618c-.273 1.785.57 3.525 2.139 5.198c-.198-.05-.403-.11-.61-.168c-4.631-1.303-6.9-3.135-7.509-5.22m7.958.493c.16-1.05.839-1.781 1.553-2.045c.66-.242 1.393-.115 1.95.69a1.104 1.104 0 0 0 1.545.273c.8-.567 1.532-.435 2.068.018c.582.492.968 1.412.76 2.453c-.225 1.13-1.368 2.328-4.155 3.381c-.177.067-.353.139-.535.192c-.153-.113-.294-.24-.438-.363c-2.258-1.943-2.923-3.46-2.748-4.6Z"
        ></path>
      </g>
    </svg>
  );
}

function MingcuteHandHeartLine(props) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="60px"
      height="60px"
      className="mx-auto text-primary-7"
      viewBox="0 0 24 24"
      {...props}
    >
      <g fill="none" fillRule="evenodd">
        <path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"></path>
        <path
          fill="currentColor"
          d="m11.253 11.79l.226.05l3.716.928c1.171.293 1.76 1.528 1.39 2.64l.32-.22l.646-.462c.325-.23.657-.448 1.002-.62c1.536-.768 3.334.291 3.442 1.971l.005.16v.055c0 .697-.3 1.357-.82 1.814l-.147.12l-3.07 2.302c-.299.224-.636.39-.994.49l-.218.052l-3.21.642a5 5 0 0 1-2.964-.314l-.252-.117l-2.35-1.175a1 1 0 0 0-.331-.1L7.528 20h-.796a2 2 0 0 1-1.563.993L5 21H4a2 2 0 0 1-1.995-1.85L2 19v-4a2 2 0 0 1 1.85-1.994L4 13h1c.484 0 .928.172 1.274.459l.125.112l1.99-1.243a4 4 0 0 1 2.636-.575zm-1.804 2.234L7 15.554V18h.528a3 3 0 0 1 1.342.317l2.35 1.175a3 3 0 0 0 1.93.258l3.209-.642a.998.998 0 0 0 .404-.18l3.07-2.303c.128-.096.167-.237.167-.389a.382.382 0 0 0-.513-.359l-2.428 1.62a3 3 0 0 1-1.665.503H12v-2h1.559a1 1 0 0 0 .948-.684l.203-.608l-3.716-.928a2 2 0 0 0-1.545.244M5 15H4v4h1zM16 3.47c1.03-.644 2.212-.593 3.166-.037c1.112.648 1.866 1.942 1.833 3.422c-.041 1.835-1.41 3.344-3.438 4.6l-.398.239c-.358.212-.74.418-1.163.418c-.423 0-.805-.206-1.163-.418l-.398-.24C12.41 10.198 11.042 8.69 11 6.854c-.033-1.48.721-2.774 1.833-3.422c.954-.556 2.135-.607 3.166.037Zm2.159 1.691c-.379-.22-.83-.246-1.278.136l-.206.19a1.084 1.084 0 0 1-1.35 0l-.206-.19c-.449-.382-.9-.357-1.278-.136c-.461.269-.858.87-.84 1.65c.017.778.618 1.78 2.468 2.929l.238.144l.293.171l.293-.17C18.33 8.673 18.981 7.62 19 6.808c.018-.779-.379-1.38-.84-1.649Z"
        ></path>
      </g>
    </svg>
  );
}
