import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Header extends Component {
    render() { 
        return ( 
            <div className="bg-secondary" style={{minHeight: 20 + 'rem'}}>
                <p className="text-center">Black friday</p>
            </div>
         );
    }
}
 
export default Header;