import React, { Component } from 'react';
import {Link, withRouter} from "react-router-dom";


class AddAdmin extends Component {

    constructor() {
        super();
        this.state = {
            name: '',
            email: '',
            password: '',
            address: '',
            role_id: ''
        }

        this.changehandel = this.changehandel.bind(this);
        this.adminhandle = this.adminhandle.bind(this);
    }

    changehandel(event) {
        const fieldValue = event.target.name;
        this.setState({
            [fieldValue]: event.target.value
        })
    }
    
    adminhandle(event) {
        event.preventDefault();
        const fetchData = {
            name: this.state.name,
            email: this.state.email,
            password: this.state.password,
            address: this.state.address,
            role_id: this.state.role_id
        };
        
        fetch(`/dashboard/admin`, {
            method: 'POST',
            body: JSON.stringify(fetchData),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            }
        }).then(res => {
                res.json();
                if(res) {
                    this.props.add_admin(fetchData);
                    this.props.history.push('/dashboard/admin');
                }
            })
            //.then(data => console.log(data))
            .catch(err => console.error("Error:", err));
    }
    

    render() {

        let roles = [
            {id: 1, name: 'one'},
            {id: 2, name: 'two'},
            {id: 3, name: 'three'},
        ];

        return(
            <div className="card">
                <div className="card-header h2">Create New admin</div>
                    <div className="card-body">
                        <form id="myForm" onSubmit={this.adminhandle}>
                            <div className="form-group">
                                <label htmlFor="name" readOnly>Name</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="admin[name]" aria-describedby="" 
                                name="name"
                                value={this.state.fieldValue}
                                onChange={this.changehandel}
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputEmail1">Email address</label>
                                <input 
                                type="email" 
                                className="form-control" 
                                id="admin[email]" 
                                aria-describedby="emailHelp" 
                                name="email"
                                value={this.state.fieldValue}
                                onChange={this.changehandel} 
                                />
                            </div>
                            <div className="form-group">
                                <label htmlFor="exampleInputPassword1">Password</label>
                                <input 
                                type="password" 
                                className="form-control" 
                                id="admin[password]" 
                                name="password" 
                                value={this.state.fieldValue}
                                onChange={this.changehandel}
                                />
                            </div>
                            
                            <div className="form-group">
                                <label htmlFor="address">address</label>
                                <input 
                                type="text" 
                                className="form-control" 
                                id="admin[address]" aria-describedby="" 
                                name="address" 
                                value={this.state.fieldValue}
                                onChange={this.changehandel}
                                />
                            </div>
                           <div className="form-group">

                                <label htmlFor="exampleInputPassword1">Roles</label>
                                <select className="form-control">
                                    <optgroup label="This is a group">
                                        {roles.map(role => <option key={role.id}>{role.name}</option>)}
                                    </optgroup>
                                </select>
                            </div>
                            <div className="form-group">
                                <button className="btn btn-primary btn-block" type="submit">Add Admin</button>
                            </div>
                        </form>
                    </div>
            </div>
        );
    }
}
//  var myForm=$('#myForm');
    
//     myForm.onsubmit= async(e) => {
//         e.preventDefault();
//     }

export default withRouter(AddAdmin);
