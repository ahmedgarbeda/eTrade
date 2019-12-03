import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Footer extends Component {
    render() { 
        return ( 
            <div className="bg-secondary" style={{minHeight: 15 + 'rem'}}>
                <p className="text-center">Footer</p>
            </div>
         );
    }
}
 
export default Footer;