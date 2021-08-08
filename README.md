
# AI ChatBot for VTU
  
A simple chatbot component to create conversation chats


## Getting Start

```bash
npm install react-simple-chatbot --save
```

## Usage


``` javascript
import ChatBot from 'react-simple-chatbot';

const steps = [
  {
    id: '0',
    message: 'Welcome to chatbot!',
    trigger: '1',
  },
  {
    id: '1',
    message: 'Bye!',
    end: true,
  },
];

ReactDOM.render(
  <div>
    <ChatBot steps={steps} />
  </div>,
  document.getElementById('root')
);
```


## Authors

|![Saqib](https://avatars.githubusercontent.com/u/31315815?v=3&s=150)|
|:---------------------:|
|  [Mohammed Saqib](https://github.com/mdsaqib108)   |


## Donate

If you liked this project, you can donate to support it :heart:

<a href="https://www.buymeacoffee.com/mdsaqib" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" width= 217px ></a>

## License

MIT · [Mohammed Saqib](https://mdsaqib108.github.io/)